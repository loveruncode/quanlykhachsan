import classNames from 'classnames/bind';
import PropTypes from 'prop-types';

import styles from './Input.module.scss';

const cx = classNames.bind(styles);

export default function Input({ label, data, setData, placeholder, type = 'text', readOnly = false, classname }) {
    const classes = cx('InputConainer', { [classname]: classname });
    return (
        <>
            <div className={classes}>
                <label>{label}</label>
                <input
                    type={type}
                    value={data}
                    onChange={(e) => setData(e.target.value)}
                    placeholder={placeholder}
                    readOnly={readOnly}
                />
            </div>
        </>
    );
}

Input.propTypes = {
    label: PropTypes.string.isRequired,
    data: PropTypes.string.isRequired,
    setData: PropTypes.func.isRequired,
    placeholder: PropTypes.string,
    readOnly: PropTypes.bool,
    classname: PropTypes.string,
    type: PropTypes.string
};
