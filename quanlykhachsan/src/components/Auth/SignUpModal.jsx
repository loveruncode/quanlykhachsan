import PropTypes from 'prop-types';
import classNames from 'classnames/bind';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import Modal from '~/components/Modal';
import styles from './Auth.module.scss';
import Button from '~/components/Button';
import { useState } from 'react';

const cx = classNames.bind(styles);

export default function SignUpModal({ isOpen, closeModal, switchToSignIn }) {
    const [formData, setFormData] = useState({});

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.id]: e.target.value });
    };

    const handleSignUpSubmit = async (e) => {
        e.preventDefault();
        try {
            const res = await fetch('/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            if (res.ok) {
                const data = await res.json();
                console.log('Login successful:', data);
                toast.success('Đăng Ký thành công');
                console.log(data);
                closeModal();
                window.location.reload();
            } else {
                const data = await res.json();
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
                <select className={cx('select')} id="gender" name="gender" onChange={handleChange} required>
                    <option className={cx('opt')} value="1">
                        Nam
                    </option>
                    <option className={cx('opt')} value="2">
                        Nữ
                    </option>
                </select>
                <input
                    type="password"
                    placeholder="Mật khẩu"
                    minLength={6}
                    id="password"
                    onChange={handleChange}
                    required
                />
                <input type="password" placeholder="Xác nhận mật khẩu" minLength={6} required />
                <span>
                    Đã có tài khoản?
                    <Button onClick={switchToSignIn} className={cx('signup-link')}>
                        Đăng Nhập
                    </Button>
                </span>
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
