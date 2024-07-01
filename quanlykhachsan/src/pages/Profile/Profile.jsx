import { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';
import classNames from 'classnames/bind';

import styles from './Profile.module.scss';
import Input from '~/components/Input';
import Image from '~/components/image';
import Button from '~/components/Button';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBookBookmark, faShieldHalved, faUser, faEdit } from '@fortawesome/free-solid-svg-icons';
import { useSelector } from 'react-redux';
import config from '~/config';
import { Get } from '~/components/AxiosClient';

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
    const [isEditing, setIsEditing] = useState(false); // Thêm trạng thái editMode

    const maskEmail = (email) => {
        let [localPart, domain] = email.split('@');
        if (localPart.length > 2) {
            localPart = localPart[0] + '***' + localPart[localPart.length - 1];
        }
        return localPart + '@' + domain;
    };

    useEffect(() => {
        const token = currentUser.access_token;

        if (!token) {
            console.error('Token or encoded user_id is not available. Redirect to login page or handle the situation.');
            return;
        }

        const fetchUserInfo = async () => {
            try {
                const response = await Get({ endPoint: `profilev1/${userId}`, Authorization: `Bearer ${token}` });

                if (response.status === 200) {
                    const data = response.data.data;
                    setFormData({
                        name: data.name || '',
                        birthday: data.birthday || '',
                        address: data.address || '',
                        avatar: data.avatar || null,
                        email: data.email || '',
                        phone: data.phone || '',
                        gender: data.gender || '',
                        roles: data.roles || ''
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
        // TODO: Thực hiện API lưu thay đổi thông tin người dùng ở đây
        console.log('Saving changes:', formData);
        setIsEditing(false); // Chuyển về chế độ xem sau khi lưu thay đổi
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

    const handleEditClick = (e) => {
        e.preventDefault();
        setIsEditing(true); // Chuyển về chế độ chỉnh sửa khi nhấn nút "Sửa"
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
                            {isEditing && (
                                <>
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
                                </>
                            )}
                        </div>
                        <div className={cx('info-inputs')}>
                            <div className={cx('inline')}>
                                <Input
                                    label="Họ và Tên"
                                    data={formData.name}
                                    setData={(value) => setFormData({ ...formData, name: value })}
                                    className={cx('username')}
                                    readOnly={!isEditing}
                                />
                                {!isEditing ? (
                                    <Input
                                        label="Email"
                                        data={maskEmail(formData.email)}
                                        setData={(value) => setFormData({ ...formData, email: value })}
                                        className={cx('email')}
                                        readOnly
                                    />
                                ) : (
                                    <Input
                                        label="Email"
                                        data={formData.email}
                                        setData={(value) => setFormData({ ...formData, email: value })}
                                        className={cx('email')}
                                        readOnly
                                    />
                                )}
                            </div>
                            <div className={cx('inline')}>
                                <Input
                                    label="Số Điện Thoại"
                                    data={formData.phone}
                                    setData={(value) => setFormData({ ...formData, phone: value })}
                                    className={cx('phone')}
                                    readOnly={!isEditing}
                                />
                                <Input
                                    label="Ngày Sinh"
                                    type="date"
                                    data={formData.birthday}
                                    setData={(value) => setFormData({ ...formData, birthday: value })}
                                    className={cx('date')}
                                    readOnly={!isEditing}
                                />
                            </div>
                            <div className={cx('inline')}>
                                <Input
                                    label="Địa Chỉ"
                                    data={formData.address}
                                    setData={(value) => setFormData({ ...formData, address: value })}
                                    className={cx('address')}
                                    readOnly={!isEditing}
                                />
                                <select
                                    name="gender"
                                    id="gender"
                                    value={formData.gender}
                                    className={cx('gender')}
                                    onChange={(e) => setFormData({ ...formData, gender: e.target.value })}
                                    disabled={!isEditing}
                                >
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                            {isEditing ? (
                                <Button primary className={cx('save-button')} onClick={handleSaveChanges}>
                                    Lưu thay đổi
                                </Button>
                            ) : (
                                location.pathname === `/profile` && (
                                    <Button className={cx('save-button')} onClick={handleEditClick} outline>
                                        <FontAwesomeIcon icon={faEdit} style={{ paddingRight: '5px' }} />
                                        Sửa
                                    </Button>
                                )
                            )}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}
