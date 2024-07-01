import { useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import PropTypes from 'prop-types';
import classNames from 'classnames/bind';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import Modal from '~/components/Modal';
import styles from './Auth.module.scss';
import Button from '~/components/Button';
import { signInStart, signInSuccess, signInFailure } from '~/redux/user/userSlice';
import { useNavigate } from 'react-router-dom';
import { Post } from '../AxiosClient';

const cx = classNames.bind(styles);

export default function SignInModal({ isOpen, closeModal, switchToSignUp }) {
    const [formData, setFormData] = useState({ email: '', password: '' });
    const { loading, error } = useSelector((state) => state.user);

    const navigate = useNavigate();
    const dispatch = useDispatch();

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.id]: e.target.value });
    };

    const handleSignInSubmit = async (e) => {
        e.preventDefault();

        if (validate()) {
            try {
                dispatch(signInStart());
                const response = await Post({ endPoint: 'login', data: formData });
                console.log(response);
                console.log(formData);

                if (response.status == 200) {
                    const data = response.data;
                    console.log('data', data);
                    toast.success('Đăng nhập thành công');
                    dispatch(signInSuccess(data));
                    setFormData({ email: '', password: '' });
                    // closeModal();
                    navigate('/room');
                } else {
                    // const data = await response.json();
                    const data = response.data;
                    toast.error(data.error || 'Đăng nhập thất bại');
                    dispatch(signInFailure(data));
                }
            } catch (error) {
                toast.error('Lỗi mạng');
                dispatch(signInFailure(error));
            }
        }
    };

    const validate = () => {
        if (!formData.email) {
            toast.warning('Vui lòng nhập email');
            return false;
        }
        if (!formData.password) {
            toast.warning('Vui lòng nhập mật khẩu');
            return false;
        }
        return true;
    };

    return (
        <Modal isOpen={isOpen} title="Đăng Nhập" closeModal={closeModal}>
            <form onSubmit={handleSignInSubmit} className={cx('form')}>
                <h2 className={cx('form-title')}>Đăng Nhập vào EQHotel</h2>
                <input
                    name="email"
                    type="email"
                    id="email"
                    placeholder="Email"
                    value={formData.email}
                    onChange={handleChange}
                />
                <input
                    name="password"
                    type="password"
                    id="password"
                    placeholder="Mật khẩu"
                    minLength={6}
                    value={formData.password}
                    onChange={handleChange}
                />
                <div className={cx('changeSignUp')}>
                    <span className={cx('csut')}>Chưa có tài khoản?</span>
                    <Button type="button" onClick={switchToSignUp} className={cx('signup-link')}>
                        Đăng Ký
                    </Button>
                </div>
                <Button disabled={loading} type="submit" primary>
                    {loading ? 'Loading...' : 'Đăng Nhập'}
                </Button>
                <p className="text-red-700 mt-5">{error ? error.message || 'Something went wrong!' : ''}</p>
            </form>
        </Modal>
    );
}

SignInModal.propTypes = {
    isOpen: PropTypes.bool.isRequired,
    closeModal: PropTypes.func.isRequired,
    switchToSignUp: PropTypes.func
};
