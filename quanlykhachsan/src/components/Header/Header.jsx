import classNames from 'classnames/bind';
import { useState } from 'react';

import Modal from '../Modal';
import styles from './Header.module.scss';

const cx = classNames.bind(styles);

export default function Header() {
    const [isOpen, setOpen] = useState(false);
    const [isSignInOpen, setSignInOpen] = useState(false);

    const openModal = (type) => {
        if (type === 'signup') {
            setOpen(true);
        } else if (type === 'signin') {
            setSignInOpen(true);
        }
    };

    const closeModal = () => {
        setOpen(false);
        setSignInOpen(false);
    };

    return (
        <>
            <div className={cx('header')}>Header</div>
            <button onClick={() => openModal('signup')}>SignUp</button>
            <button onClick={() => openModal('signin')}>SignIn</button>

            <Modal isOpen={isOpen} title="Đăng Ký" closeModal={closeModal}>
                <form action="" className={cx('form')}>
                    <h2 className={cx('form-title')}>Chào mừng bạn đến với Hotel</h2>
                    <input type="text" placeholder="Họ và tên" />
                    <input type="tel" placeholder="Số điện thoại" />
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Mật khẩu" minLength={6} />
                    <input type="password" placeholder="Xác nhận mật khẩu" minLength={6} />
                    <button>Tiếp Tục</button>
                </form>
            </Modal>

            <Modal isOpen={isSignInOpen} title="Đăng Nhập" closeModal={closeModal}>
                <form action="" className={cx('form')}>
                    <h2 className={cx('form-title')}>Đăng Nhập vào Hotel</h2>
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Mật khẩu" minLength={6} />
                    <button>Đăng Nhập</button>
                </form>
            </Modal>
        </>
    );
}
