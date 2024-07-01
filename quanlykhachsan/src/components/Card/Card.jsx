import PropTypes from 'prop-types';
import classNames from 'classnames/bind';

import styles from './Card.module.scss';

const cx = classNames.bind(styles);

export default function Card({ children, className }) {
    const classes = cx('cardContainer', { [className]: className });
    return (
        <>
            <div className={cx(classes)}>{children}</div>
        </>
    );
}
Card.propTypes = {
    children: PropTypes.node.isRequired,
    className: PropTypes.string
};
