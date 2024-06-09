import classNames from 'classnames/bind';

import styles from './Search.module.scss';

const cx = classNames.bind(styles);

export default function Search() {
    return (
        <div className={cx('searchbar')}>
            <form>
                <input type="text" placeholder="Search..." />
            </form>
        </div>
    );
}
