import classNames from 'classnames/bind';
import { Link } from 'react-router-dom';

import config from '~/config';
import Search from './components/Search';
import Notify from './components/Notify';
import Image from '~/components/image';
import Button from '~/components/Button';
import Cart from './components/Cart';
import Auth from '../Auth';
import images from '~/assets/images';
import styles from './Header.module.scss';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
// import { decodeUserId } from '~/utils';

const cx = classNames.bind(styles);

export default function Header() {
    const userId = localStorage.getItem('user_id');
    // const encodedUserId = localStorage.getItem('user_id');
    // const id = decodeUserId(encodedUserId);
    // console.log(id);
    const token = localStorage.getItem('token');
    const currentUser = token ? true : false;

    const handleLogout = async () => {
        try {
            const response = await fetch(`${import.meta.env.VITE_url}/api/logout`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                   'Accept': 'application/json',
                }
            });

            if (response.ok) {
                localStorage.removeItem('token');
                localStorage.removeItem('user_id');
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
                                {/* <Link to={`${config.routes.profile}/${id}`}> */}
                                <Link to={`${config.routes.profile}/${userId}`}>
                                    <Image className={cx('user-avatar')} src="asdahjsbdjas" alt="Nguyen Van A" />
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
