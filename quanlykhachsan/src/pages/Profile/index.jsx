import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import classNames from 'classnames/bind';
import { getUserById } from './users';

import styles from './Profile.module.scss';
import Image from '~/components/image';
import Button from '~/components/Button';

const cx = classNames.bind(styles);

function Profile() {
    let { id } = useParams();
    const [user, setUser] = useState(null);
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [phone, setPhone] = useState('');
    const [avatar, setAvatar] = useState('');
    const [isEditing, setIsEditing] = useState(false);

    useEffect(() => {
        getUserById(id)
            .then((userData) => {
                setUser(userData);
                setName(userData.name);
                setEmail(userData.email);
                setPhone(userData.phone);
            })
            .catch((error) => {
                console.error('Error fetching user:', error);
            });
    }, [id]);

    const handleEdit = () => {
        setIsEditing(true);
    };

    const handleSave = () => {
        setIsEditing(false);
    };

    const handleCancel = () => {
        // Reset state to the original user data
        setName(user.name);
        setEmail(user.email);
        setPhone(user.phone);
        setAvatar(user.avatar);
        setIsEditing(false);
    };

    if (!user) {
        return <div>Loading...</div>;
    }
    // test
    return (
        <div className={cx('profileWrapper')}>
            <h2>Profile</h2>
            <div className={cx('profile')}>
                <div className={cx('profile__left')}>
                    <Image className={cx('profile__left__avatar')} src={user.avatar} alt={user.name} />
                    {!isEditing && (
                        <Button primary className={cx('profile__left__editButton')} onClick={handleEdit}>
                            Edit Profile
                        </Button>
                    )}
                    {isEditing && (
                        <>
                            <input
                                type="file"
                                accept="image/*"
                                onChange={avatar}
                                className={cx('profile__left__avatarInput')}
                            />
                        </>
                    )}
                </div>
                <div className={cx('profile__right')}>
                    <div className={cx('profile__right__userInfo')}>
                        {isEditing ? (
                            <>
                                <div className={cx('profile__right__userInfo__item')}>
                                    <strong>User Name:</strong>{' '}
                                    <input type="text" value={name} onChange={(e) => setName(e.target.value)} />
                                </div>
                                <div className={cx('profile__right__userInfo__item')}>
                                    <strong>Email:</strong>{' '}
                                    <input type="text" value={email} onChange={(e) => setEmail(e.target.value)} />
                                </div>
                                <div className={cx('profile__right__userInfo__item')}>
                                    <strong>Phone:</strong>{' '}
                                    <input type="text" value={phone} onChange={(e) => setPhone(e.target.value)} />
                                </div>
                                <Button className={cx('profile__right__userInfo__editButtons')} onClick={handleSave}>
                                    Save
                                </Button>
                                <Button className={cx('profile__right__userInfo__editButtons')} onClick={handleCancel}>
                                    Cancel
                                </Button>
                            </>
                        ) : (
                            <>
                                <p className={cx('profile__right__userInfo__item')}>
                                    <strong>User Name:</strong> {user.name}
                                </p>
                                <p className={cx('profile__right__userInfo__item')}>
                                    <strong>Email:</strong> {user.email}
                                </p>
                                <p className={cx('profile__right__userInfo__item')}>
                                    <strong>Phone:</strong> {user.phone}
                                </p>
                            </>
                        )}
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Profile;
