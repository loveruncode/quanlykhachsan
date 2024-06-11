import { useEffect, useRef } from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames/bind';

import styles from './OffCanvas.module.scss';

const cx = classNames.bind(styles);

export default function OffCanvas({
    isOpen,
    title,
    closeOffCanvas,
    background = true,
    position = 'right',
    page,
    children,
    className
}) {
    const offCanvasRef = useRef(null);

    // Handle key down "Esc" to exit offCanvas
    useEffect(() => {
        const handleKeyDown = (event) => {
            if (event.keyCode === 27 && isOpen) {
                closeOffCanvas();
            }
        };

        window.addEventListener('keydown', handleKeyDown);

        return () => {
            window.removeEventListener('keydown', handleKeyDown);
        };
    }, [isOpen, closeOffCanvas]);

    // Handle click outside to close offCanvas
    useEffect(() => {
        const handleClickOutside = (event) => {
            if (offCanvasRef.current && !offCanvasRef.current.contains(event.target)) {
                closeOffCanvas();
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
    }, [isOpen, closeOffCanvas]);

    // Dynamically calculate classes using classNames/bind
    const offCanvasClasses = cx('offCanvas', position, className, {
        'offCanvas-page': page,
        show: isOpen
    });
    const offCanvasBackground = cx({
        'offCanvas-background': background
    });
    // If not open, return null to hide offCanvas
    if (!isOpen) return null;

    return (
        <div className={offCanvasBackground}>
            <div className={offCanvasClasses}>
                <div ref={offCanvasRef} className={cx('offCanvas-content')}>
                    <div className={cx('offCanvas-header')}>
                        <span className={cx('close')} onClick={closeOffCanvas}>
                            &times;
                        </span>
                        <h2 className={cx('offCanvas-title')}>{title}</h2>
                    </div>
                    <div className={cx('offCanvas-body')}>{children}</div>
                </div>
            </div>
        </div>
    );
}

OffCanvas.propTypes = {
    isOpen: PropTypes.bool.isRequired,
    title: PropTypes.string.isRequired,
    closeOffCanvas: PropTypes.func.isRequired,
    className: PropTypes.string,
    children: PropTypes.node.isRequired,
    position: PropTypes.oneOf(['left', 'right', 'top', 'bottom']),
    background: PropTypes.bool,
    page: PropTypes.bool // Thêm PropTypes cho 'page'
};
