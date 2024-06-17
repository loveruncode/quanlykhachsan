import { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';
import classNames from 'classnames/bind';

import styles from './Profile.module.scss';
import Input from '~/components/Input';
import Image from '~/components/image';
import Button from '~/components/Button';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBookBookmark, faShieldHalved, faUser } from '@fortawesome/free-solid-svg-icons';
import { useSelector } from 'react-redux';
import config from '~/config';

const cx = classNames.bind(styles);

export default function Profile() {
    const { currentUser } = useSelector((state) => state.user);
    const userId = currentUser.user_id;

    const location = useLocation();
    const [formData, setFormData] = useState({
        name: '',
        birthday: '',
        address: '',
        avatar: null,
        email: '',
        phone: '',
        gender: '',
        roles: ''
    });

    useEffect(() => {
        const token = currentUser.access_token;

        if (!token) {
            console.error('Token or encoded user_id is not available. Redirect to login page or handle the situation.');
            return;
        }

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
                    setFormData({
                        name: data.data.name || '',
                        birthday: data.data.birthday || '',
                        address: data.data.address || '',
                        avatar: data.data.avatar || null,
                        email: data.data.email || '',
                        phone: data.data.phone || '',
                        gender: data.data.gender || '',
                        roles: data.data.roles || ''
                    });
                } else {
                    console.error('Failed to fetch user data');
                }
            } catch (error) {
                console.error('Network error:', error);
            }
        };

        fetchUserInfo();
    }, [userId, currentUser.access_token]);

    if (!formData.name) {
        return <div>Loading...</div>;
    }

    const handleSaveChanges = async (e) => {
        e.preventDefault();
        console.log(formData);
    };

    const handleAvatarChange = (e) => {
        const file = e.target.files[0];
        if (file) {
            setFormData({
                ...formData,
                avatar: URL.createObjectURL(file)
            });
        }
    };

    const handleButtonClick = (e) => {
        e.preventDefault();
        document.getElementById('avatar-input').click();
    };

    let userRole;
    if (formData.roles == '1') {
        userRole = 'Quản Trị Viên';
    }
    if (formData.roles == '2') {
        userRole = 'Khách Hàng';
    }

    return (
        <div className={cx('profile')}>
            <div className={cx('wrapper')}>
                <div className={cx('left')}>
                    <ul>
                        <Button
                            className={cx('btn-Link', { active: location.pathname === config.routes.profile })}
                            to={config.routes.profile}
                        >
                            <FontAwesomeIcon icon={faUser} style={{ paddingRight: '5px' }} />
                            Thông tin tài khoản
                        </Button>
                        <Button
                            className={cx('btn-Link', {
                                active: location.pathname === config.routes.historyOrders
                            })}
                            to={config.routes.historyOrders}
                        >
                            <FontAwesomeIcon icon={faBookBookmark} style={{ paddingRight: '5px' }} />
                            Lịch sử đơn hàng
                        </Button>
                        <Button
                            className={cx('btn-Link', { active: location.pathname === config.routes.security })}
                            to={config.routes.security}
                        >
                            <FontAwesomeIcon icon={faShieldHalved} style={{ paddingRight: '5px' }} />
                            Bảo mật tài khoản
                        </Button>
                    </ul>
                </div>
                <div className={cx('right')}>
                    <span className={cx('title')}>Thông Tin Tài Khoản {userRole}</span>
                    <form className={cx('profile-info')}>
                        <div className={cx('info-avatar')}>
                            <Image src={formData.avatar} alt="Avatar" className={cx('profile-image')} />
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
                                <Input
                                    label="Họ và Tên"
                                    data={formData.name}
                                    setData={(value) => setFormData({ ...formData, name: value })}
                                    className={cx('username')}
                                />
                                <Input
                                    label="Email"
                                    data={formData.email}
                                    setData={(value) => setFormData({ ...formData, email: value })}
                                    className={cx('email')}
                                    readOnly
                                />
                            </div>
                            <div className={cx('inline')}>
                                <Input
                                    label="Số Điện Thoại"
                                    data={formData.phone}
                                    setData={(value) => setFormData({ ...formData, phone: value })}
                                    className={cx('phone')}
                                />
                                <Input
                                    label="Ngày Sinh"
                                    type="date"
                                    data={formData.birthday}
                                    setData={(value) => setFormData({ ...formData, birthday: value })}
                                    className={cx('date')}
                                />
                            </div>
                            <div className={cx('inline')}>
                                <Input
                                    label="Địa Chỉ"
                                    data={formData.address}
                                    setData={(value) => setFormData({ ...formData, address: value })}
                                    className={cx('address')}
                                />
                                <select
                                    name="gender"
                                    id="gender"
                                    value={formData.gender}
                                    className={cx('gender')}
                                    onChange={(e) => setFormData({ ...formData, gender: e.target.value })}
                                >
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                            {/* <p>Vai trò: {userRole}</p> */}
                            {location.pathname === `/profile` && (
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
