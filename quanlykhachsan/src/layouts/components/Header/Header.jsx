import classNames from 'classnames/bind';
import { useDispatch } from 'react-redux';
import { useSelector } from 'react-redux';
import { Link } from 'react-router-dom';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import config from '~/config';
import { logOut } from '~/redux/user/userSlice';
import styles from './Header.module.scss';
import Button from '~/components/Button';
import Image from '~/components/image';
import Auth from '~/components/Auth';
import images from '~/assets/images';
import Search from '../Search';
import Notify from '../Notify';
import Cart from '../Cart';
import { useEffect, useState } from 'react';

const cx = classNames.bind(styles);

export default function Header() {
    const [avatar, setAvatar] = useState(null);
    const dispatch = useDispatch();
    const { currentUser } = useSelector((state) => state.user);

    useEffect(() => {
        // nếu có currentUser mới lấy token + id sau đó fetch để lấy avatar
        if (currentUser) {
            const token = currentUser.access_token;
            const userId = currentUser.user_id;

            const fetchUserInfo = async () => {
                try {
                    const response = await fetch(`/api/profilev1/${userId}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            Accept: 'application/json',
                            Authorization: `Bearer ${token}`
                        }
                    });

                    if (response.ok) {
                        const data = await response.json();
                        setAvatar(data.data.avatar || null);
                    } else {
                        console.error('Failed to fetch user data');
                        setAvatar(null); // Set avatar về null khi lỗi
                    }
                } catch (error) {
                    console.error('Network error:', error);
                    setAvatar(null); // Set avatar về null khi lỗi
                }
            };

            fetchUserInfo();
        }
    }, [currentUser]);

    const handleLogout = async () => {
        try {
            const response = await fetch('/api/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json'
                }
            });

            if (response.ok) {
                dispatch(logOut());
                toast.success('Đăng xuất thành công');
                console.log('Logout successful');
                window.location.reload();
            } else {
                const data = await response.json();
                toast.error(data.error || 'Đăng xuất thất bại');
                console.error('Logout error:', data.error);
            }
        } catch (error) {
            console.error('Logout error:', error);
            toast.error('Đăng xuất thất bại');
        }
    };

    return (
        <>
            <header className={cx('header')}>
                <div className={cx('header__left')}>
                    <Link className={cx('header__left-logo')} to={config.routes.home}>
                        <img src={images.logo} alt="logo" />
                    </Link>
                </div>

                <div className={cx('header__center')}>
                    <Search />
                </div>

                <div className={cx('header__right')}>
                    {/* Nếu đã đăng nhập thì hiển thị thông tin người dùng và nút Đăng Xuất */}
                    {currentUser ? (
                        <ul className={cx('header__rigth-currentuser')}>
                            <li className={cx('header__right-notify')}>
                                <Notify />
                            </li>
                            <li className={cx('header__right-cart')}>
                                <Cart />
                            </li>
                            <li>
                                <Link to={`${config.routes.profile}`}>
                                    <Image className={cx('user-avatar')} src={avatar} alt="Nguyen Van A" />
                                </Link>
                            </li>
                            <li>
                                <Button outline text onClick={handleLogout} className={cx('btn-logout')}>
                                    Đăng Xuất
                                </Button>
                            </li>
                        </ul>
                    ) : (
                        <Auth />
                    )}
                </div>
            </header>

            {/* Menu điều hướng */}
            <nav className={cx('menu')}>
                <ul>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to={config.routes.room}>
                            Room
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to={config.routes.shop}>
                            Shop
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to={config.routes.blog}>
                            Blog
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to={config.routes.contact}>
                            Contact
                        </Link>
                    </li>
                </ul>
            </nav>
        </>
    );
}