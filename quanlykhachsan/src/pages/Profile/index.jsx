import { useEffect, useState } from 'react';
import { useParams, useLocation } from 'react-router-dom';
import classNames from 'classnames/bind';

import styles from './Profile.module.scss';
import Input from '~/components/Input';
import Image from '~/components/image';
import Button from '~/components/Button';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBookBookmark, faShieldHalved, faUser } from '@fortawesome/free-solid-svg-icons';
// import { decodeUserId } from '~/utils';

const cx = classNames.bind(styles);

export default function Profile() {
    const { id } = useParams();
    const location = useLocation();
    const [user, setUser] = useState(null);
    const [birthday, setBirthday] = useState('');
    const [address, setAddress] = useState('');
    const [avatar, setAvatar] = useState(null);
    const [email, setEmail] = useState('');
    const [phone, setPhone] = useState('');
    const [name, setName] = useState('');

    useEffect(() => {
        const token = localStorage.getItem('token');
        // const encodedUserId = localStorage.getItem('user_id');

        // if (!token || !encodedUserId) {
        if (!token) {
            // Xử lý khi không có token hoặc encodedUserId
            console.error('Token or encoded user_id is not available. Redirect to login page or handle the situation.');
            return;
        }

        // const id = decodeUserId(encodedUserId);
        console.log(id);

        const fetchUserInfo = async () => {
            try {
                const response = await fetch(`${import.meta.env.VITE_url}/api/profile/${id}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        Authorization: `Bearer ${token}`
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    console.log(data.data);
                    setUser(data.data);
                    setBirthday(data.data.birthday || '');
                    setAddress(data.data.address || '');
                    setAvatar(data.data.avatar || '');
                    setEmail(data.data.email || '');
                    setPhone(data.data.phone || '');
                    setName(data.data.name || '');
                } else {
                    console.error('Failed to fetch user data');
                }
            } catch (error) {
                console.error('Network error:', error);
            }
        };

        fetchUserInfo();
    }, [id]);

    if (!user) {
        return <div>Loading...</div>;
    }

    const handleSaveChanges = (e) => {
        e.preventDefault();
        console.log({ name, email, phone, address, birthday });
    };

    const handleAvatarChange = (e) => {
        const file = e.target.files[0];
        if (file) {
            setAvatar(URL.createObjectURL(file));
        }
    };

    const handleButtonClick = (e) => {
        e.preventDefault();
        document.getElementById('avatar-input').click();
    };

    return (
        <div className={cx('profile')}>
            <div className={cx('wrapper')}>
                <div className={cx('left')}>
                    <ul>
                        <Button
                            className={cx('btn-Link', { active: location.pathname === `/profile/${id}` })}
                            to={`/profile/${id}`}
                        >
                            <FontAwesomeIcon icon={faUser} style={{ paddingRight: '5px' }} />
                            Thông tin tài khoản
                        </Button>
                        <Button
                            className={cx('btn-Link', {
                                active: location.pathname === `/profile/${id}/history-orders`
                            })}
                            to={`/profile/${id}/history-orders`}
                        >
                            <FontAwesomeIcon icon={faBookBookmark} style={{ paddingRight: '5px' }} />
                            Lịch sử đơn hàng
                        </Button>
                        <Button
                            className={cx('btn-Link', { active: location.pathname === `/profile/${id}/security` })}
                            to={`/profile/${id}/security`}
                        >
                            <FontAwesomeIcon icon={faShieldHalved} style={{ paddingRight: '5px' }} />
                            Bảo mật tài khoản
                        </Button>
                    </ul>
                </div>
                <div className={cx('right')}>
                    <span className={cx('title')}>Thông Tin Tài Khoản</span>
                    <form className={cx('profile-info')}>
                        <div className={cx('info-avatar')}>
                            <Image src={avatar} alt="Avatar" className={cx('profile-image')} />
                            <Button onClick={handleButtonClick} outline>
                                Đổi ảnh đại diện
                            </Button>
                            <input
                                type="file"
                                id="avatar-input"
                                style={{ display: 'none' }}
                                onChange={handleAvatarChange}
                                accept="image/*"
                            />
                        </div>
                        <div className={cx('info-inputs')}>
                            <div className={cx('inline')}>
                                <Input label="Họ và Tên" data={name} setData={setName} className={cx('username')} />
                                <Input label="Email" data={email} setData={setEmail} className={cx('email')} readOnly />
                            </div>
                            <div className={cx('inline')}>
                                <Input label="Số Điện Thoại" data={phone} setData={setPhone} className={cx('phone')} />
                                <Input
                                    label="Ngày Sinh"
                                    type="date"
                                    data={birthday}
                                    setData={setBirthday}
                                    className={cx('date')}
                                />
                            </div>
                            <Input label="Địa Chỉ" data={address} setData={setAddress} className={cx('address')} />
                            {location.pathname === `/profile/${id}` && (
                                <Button primary className={cx('save-button')} onClick={handleSaveChanges}>
                                    Lưu thay đổi
                                </Button>
                            )}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}
