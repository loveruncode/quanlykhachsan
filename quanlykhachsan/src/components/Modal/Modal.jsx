import { useEffect, useRef } from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames/bind';

import styles from './Modal.module.scss';

const cx = classNames.bind(styles);

export default function Modal({ isOpen, title, closeModal, background = true, children, className }) {
    const modalRef = useRef(null);

    // Handle key down "Esc" to exit modal
    useEffect(() => {
        const handleKeyDown = (event) => {
            if (event.keyCode === 27 && isOpen) {
                closeModal();
            }
        };

        window.addEventListener('keydown', handleKeyDown);

        return () => {
            window.removeEventListener('keydown', handleKeyDown);
        };
    }, [isOpen, closeModal]);

    // Handle click outside to close modal
    useEffect(() => {
        const handleClickOutside = (event) => {
            if (modalRef.current && !modalRef.current.contains(event.target)) {
                closeModal();
            }
        };

        if (isOpen) {
            document.addEventListener('mousedown', handleClickOutside);
        } else {
            document.removeEventListener('mousedown', handleClickOutside);
        }

        return () => {
            document.removeEventListener('mousedown', handleClickOutside);
        };
    }, [isOpen, closeModal]);

    // Dynamically calculate classes using classNames/bind
    const modalClasses = cx('modal', className, { 'modal-background': background });

    // If not open, return null to hide modal
    if (!isOpen) return null;

    return (
        <div className={modalClasses}>
            <div ref={modalRef} className={cx('modal-content')}>
                <div className={cx('modal-header')}>
                    <span className={cx('close')} onClick={closeModal}>
                        &times;
                    </span>
                    <h2 className={cx('modal-title')}>{title}</h2>
                </div>
                <div className={cx('modal-body')}>{children}</div>
            </div>
        </div>
    );
}

Modal.propTypes = {
    isOpen: PropTypes.bool.isRequired,
    title: PropTypes.string.isRequired,
    closeModal: PropTypes.func.isRequired,
    className: PropTypes.string,
    children: PropTypes.node.isRequired,
    background: PropTypes.bool
};
