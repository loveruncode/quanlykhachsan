import classNames from 'classnames/bind';
import { useState } from 'react';

import Modal from '~/components/Modal';
import styles from './Auth.module.scss';
import Button from '~/components/Button';
import { useMobile } from '~/hooks';

const cx = classNames.bind(styles);

export default function Auth() {
    const [signInOpen, setSignInOpen] = useState(false);
    const [signUpOpen, setSignUpOpen] = useState(false);

    const isMobile = useMobile();

    const openSignInModal = () => {
        setSignInOpen(true);
    };

    const closeSignInModal = () => {
        setSignInOpen(false);
    };

    const openSignUpModal = () => {
        setSignUpOpen(true);
    };

    const closeSignUpModal = () => {
        setSignUpOpen(false);
    };

    const handleOnclick = (e) => {
        e.preventDefault();
        // Logic for handling form submission or other actions
    };

    const handleChangeSignUp = () => {
        closeSignInModal(); // Đóng Modal Đăng Nhập
        openSignUpModal(); // Mở Modal Đăng Ký
    };

    const handleChangeSignIn = () => {
        closeSignUpModal(); // Đóng Modal Đăng Ký
        openSignInModal(); // Mở Modal Đăng Nhập
    };

    return (
        <>
            {/* Sign In Modal */}
            {!isMobile && <Button onClick={openSignInModal}>Đăng Nhập</Button>}
            {/* Sign Up Modal */}
            <Button onClick={openSignUpModal}>Đăng Ký</Button>

            {/* Sign In Modal */}
            <Modal isOpen={signInOpen} title="Đăng Nhập" closeModal={closeSignInModal}>
                <form action="" className={cx('form')}>
                    <h2 className={cx('form-title')}>Đăng Nhập vào Hotel</h2>
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Mật khẩu" minLength={6} />
                    <span>
                        Chưa có tài khoản?
                        <Button onClick={handleChangeSignUp} className={cx('signup-link')}>
                            Đăng Ký
                        </Button>
                    </span>
                    <Button onClick={handleOnclick} primary>
                        Đăng Nhập
                    </Button>
                </form>
            </Modal>

            {/* Sign Up Modal */}
            <Modal isOpen={signUpOpen} title="Đăng Ký" closeModal={closeSignUpModal}>
                <form action="" className={cx('form')}>
                    <h2 className={cx('form-title')}>Chào mừng bạn đến với Hotel</h2>
                    <input type="text" placeholder="Họ và tên" />
                    <input type="tel" placeholder="Số điện thoại" />
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Mật khẩu" minLength={6} />
                    <input type="password" placeholder="Xác nhận mật khẩu" minLength={6} />
                    <span>
                        Đã có tài khoản?
                        <Button onClick={handleChangeSignIn} className={cx('signup-link')}>
                            Đăng nhập
                        </Button>
                    </span>
                    <Button onClick={handleOnclick} primary>
                        Đăng Ký
                    </Button>
                </form>
            </Modal>
        </>
    );
}
