import { useState } from "react";
import PropTypes from "prop-types";
import classNames from "classnames/bind";
import Modal from "~/components/Modal";
import styles from "./Auth.module.scss";
import Button from "~/components/Button";
import { toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

const cx = classNames.bind(styles);

export default function SignInModal({ isOpen, closeModal, switchToSignUp }) {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");



    const handleSignInSubmit = async (e) => {
        e.preventDefault();
        if(validate()){

        try {
            const response = await fetch(`${import.meta.env.VITE_url}/api/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            });

            if (response.ok) {
                const data = await response.json();
                console.log('Login successful:', data);
                toast.success('Đăng nhập thành công');
                const token = data.access_token;
                localStorage.setItem('token', token);
                setEmail('');
                setPassword('');
                closeModal();
                console.log(token)
                window.location.reload();
            } else {
                const data = await response.json();
                console.log('Login error:', data);
                toast.error(data.error || 'Đăng nhập thất bại');
            }
        } catch (error) {
            console.error('Network error:', error);
            toast.error('Lỗi mạng');
        }
    }
    };


    const validate = () => {
        if (!email) {
            toast.warning("Vui lòng nhập email");
            return false;
        }
        if (!password) {
            toast.warning("Vui lòng nhập mật khẩu");
            return false;
        }
        return true;
    };

    return (
        <Modal isOpen={isOpen} title="Đăng Nhập" closeModal={closeModal}>
            <form onSubmit={handleSignInSubmit} className={cx("form")}>
                <h2 className={cx("form-title")}>Đăng Nhập vào Hotel</h2>
                <input
                    value={email}
                    name="email"
                    type="email"
                    placeholder="Email"
                    onChange={(e) => setEmail(e.target.value)}
                />
                <input
                    value={password}
                    name="password"
                    type="password"
                    placeholder="Mật khẩu"
                    minLength={6}
                    onChange={(e) => setPassword(e.target.value)}
                />
                <span>
                    Chưa có tài khoản?
                    <Button type="button"
                        onClick={switchToSignUp}
                        className={cx("signup-link")}
                    >
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
    switchToSignUp: PropTypes.func.isRequired,
};
