import PropTypes from 'prop-types';
import classNames from 'classnames/bind';

import Modal from '~/components/Modal';
import styles from './Auth.module.scss';
import Button from '~/components/Button';

const cx = classNames.bind(styles);

export default function SignUpModal({ isOpen, closeModal, switchToSignIn }) {
    const handleSignUpSubmit = (e) => {
        e.preventDefault();
        // Logic xử lý khi nhấn Đăng Ký
        console.log('Sign Up form submitted');
    };

    return (
        <Modal isOpen={isOpen} title="Đăng Ký" closeModal={closeModal}>
            <form onSubmit={handleSignUpSubmit} className={cx('form')}>
                <h2 className={cx('form-title')}>Chào mừng bạn đến với Hotel</h2>
                <input type="text" placeholder="Họ và tên" required />
                <input type="tel" placeholder="Số điện thoại" required />
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Mật khẩu" minLength={6} required />
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
    switchToSignIn: PropTypes.func.isRequired
};
