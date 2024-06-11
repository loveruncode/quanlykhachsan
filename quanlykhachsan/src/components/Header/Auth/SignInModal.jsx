import PropTypes from 'prop-types';
import classNames from 'classnames/bind';

import Modal from '~/components/Modal';
import styles from './Auth.module.scss';
import Button from '~/components/Button';

const cx = classNames.bind(styles);

export default function SignInModal({ isOpen, closeModal, switchToSignUp }) {
    const handleSignInSubmit = (e) => {
        e.preventDefault();
        // Logic xử lý khi nhấn Đăng Nhập
        console.log('Sign In form submitted');
    };

    return (
        <Modal isOpen={isOpen} title="Đăng Nhập" closeModal={closeModal}>
            <form onSubmit={handleSignInSubmit} className={cx('form')}>
                <h2 className={cx('form-title')}>Đăng Nhập vào Hotel</h2>
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Mật khẩu" minLength={6} required />
                <span>
                    Chưa có tài khoản?
                    <Button onClick={switchToSignUp} className={cx('signup-link')}>
                        Đăng Ký
                    </Button>
                </span>
                <Button type="submit" primary>
                    Đăng Nhập
                </Button>
            </form>
        </Modal>
    );
}
SignInModal.propTypes = {
    isOpen: PropTypes.bool.isRequired,
    closeModal: PropTypes.func.isRequired,
    switchToSignUp: PropTypes.func.isRequired
};
