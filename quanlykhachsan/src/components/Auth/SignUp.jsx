import PropTypes from 'prop-types';
import classNames from 'classnames/bind';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import Modal from '~/components/Modal';
import styles from './Auth.module.scss';
import Button from '~/components/Button';
import { useState } from 'react';
import { Post } from '../AxiosClient';

const cx = classNames.bind(styles);

export default function SignUpModal({ isOpen, closeModal, switchToSignIn }) {
    const [formData, setFormData] = useState({});

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.id]: e.target.value });
    };

    const handleSignUpSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await Post({ endPoint: 'register', data: formData });
            console.log(response);
            console.log(formData);

            if (response.status == 201) {
                const data = response.data;
                console.log('Signup successful:', data);
                toast.success('Đăng Ký thành công');
                console.log(data);
                // closeModal();
            } else {
                const data = response.data;
                console.log('Register error:', data);
                toast.error(data.error || 'Đăng Ký thất bại');
            }
        } catch (error) {
            console.log(error);
        }
    };

    return (
        <Modal isOpen={isOpen} title="Đăng Ký" closeModal={closeModal}>
            <form onSubmit={handleSignUpSubmit} className={cx('form')}>
                <h2 className={cx('form-title')}>Chào mừng bạn đến với EQHotel</h2>
                <input type="text" placeholder="Họ và tên" id="name" onChange={handleChange} required />
                <input type="tel" placeholder="Số điện thoại" id="phone" onChange={handleChange} required />
                <input type="email" placeholder="Email" id="email" onChange={handleChange} required />
                <input
                    type="password"
                    placeholder="Mật khẩu"
                    minLength={6}
                    id="password"
                    onChange={handleChange}
                    required
                />
                <input
                    type="password"
                    placeholder="Xác nhận mật khẩu"
                    minLength={6}
                    id="confirmPassword"
                    onChange={handleChange}
                    required
                />
                <div className={cx('changeSignIn')}>
                    <span className={cx('csit')}>Đã có tài khoản?</span>
                    <Button onClick={switchToSignIn} className={cx('signup-link')}>
                        Đăng Nhập
                    </Button>
                </div>
                <Button type="submit" primary>
                    Đăng Ký
                </Button>
            </form>
        </Modal>
    );
}

SignUpModal.propTypes = {
    isOpen: PropTypes.bool.isRequired,
    closeModal: PropTypes.func.isRequired,
    switchToSignIn: PropTypes.func
};
