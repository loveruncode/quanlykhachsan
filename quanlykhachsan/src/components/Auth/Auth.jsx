import { useState } from 'react';
import classNames from 'classnames/bind';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBars } from '@fortawesome/free-solid-svg-icons';

import styles from './Auth.module.scss';
import Button from '~/components/Button';
import SignIn from './SignIn';
import SignUp from './SignUp';
import Search from '~/layouts/components/Search';
import { useMobile } from '~/hooks';
import OffCanvas from '../OffCanvas';

const cx = classNames.bind(styles);

export default function Auth() {
    const [signInOpen, setSignInOpen] = useState(false);
    const [signUpOpen, setSignUpOpen] = useState(false);
    const [showOffcanvas, setShowOffcanvas] = useState(false);

    const handleShow = () => setShowOffcanvas(true);
    const handleClose = () => setShowOffcanvas(false);
    const isMobile = useMobile();

    const openSignInModal = () => {
        setSignInOpen(true);
        setSignUpOpen(false);
        handleClose();
    };

    const closeSignInModal = () => {
        setSignInOpen(false);
        handleShow();
    };

    const openSignUpModal = () => {
        setSignUpOpen(true);
        setSignInOpen(false);
        handleClose();
    };

    const closeSignUpModal = () => {
        setSignUpOpen(false);
        handleShow();
    };

    return (
        <>
            {!isMobile ? (
                <>
                    <Button onClick={openSignInModal}>Đăng Nhập</Button>
                    <Button onClick={openSignUpModal}>Đăng Ký</Button>
                </>
            ) : (
                <>
                    <Button small onClick={handleShow}>
                        <FontAwesomeIcon icon={faBars} />
                    </Button>
                    <OffCanvas
                        isOpen={showOffcanvas}
                        background={true}
                        title="Authentication"
                        closeOffCanvas={handleClose}
                        page
                    >
                        <div className={cx('ocv-m-btn-auth')}>
                            <Button onClick={openSignInModal}>Đăng Nhập</Button>
                            <Button onClick={openSignUpModal}>Đăng Ký</Button>
                            <div className={cx('search')}>
                                <Search />
                            </div>
                        </div>
                    </OffCanvas>
                </>
            )}

            <SignIn isOpen={signInOpen} closeModal={closeSignInModal} switchToSignUp={openSignUpModal} />
            <SignUp isOpen={signUpOpen} closeModal={closeSignUpModal} switchToSignIn={openSignInModal} />
        </>
    );
}
