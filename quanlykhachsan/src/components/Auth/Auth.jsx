import { useState } from 'react';
import Button from '~/components/Button';
import SignIn from './SignIn';
import SignUp from './SignUp';
import { useMobile } from '~/hooks';

export default function Auth() {
    const [signInOpen, setSignInOpen] = useState(false);
    const [signUpOpen, setSignUpOpen] = useState(false);
    const isMobile = useMobile();

    const openSignInModal = () => {
        setSignInOpen(true);
        setSignUpOpen(false);
    };

    const closeSignInModal = () => {
        setSignInOpen(false);
    };

    const openSignUpModal = () => {
        setSignUpOpen(true);
        setSignInOpen(false);
    };

    const closeSignUpModal = () => {
        setSignUpOpen(false);
    };

    return (
        <>
            {!isMobile && <Button onClick={openSignInModal}>Đăng Nhập</Button>}
            <Button onClick={openSignUpModal}>Đăng Ký</Button>

            <SignIn isOpen={signInOpen} closeModal={closeSignInModal} switchToSignUp={openSignUpModal} />
            <SignUp isOpen={signUpOpen} closeModal={closeSignUpModal} switchToSignIn={openSignInModal} />
        </>
    );
}
