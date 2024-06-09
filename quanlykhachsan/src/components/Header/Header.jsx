import classNames from 'classnames/bind';
import { Link } from 'react-router-dom';

import Search from './components/Search';
import { logo } from '../image';
import styles from './Header.module.scss';
import Auth from './Auth';

const cx = classNames.bind(styles);

export default function Header() {
    return (
        <>
            <header className={cx('header')}>
                <div className={cx('header__left')}>
                    <Link className={cx('header__left-logo')} to="/">
                        <img src={logo} alt="logo" />
                    </Link>
                </div>

                <div className={cx('header__center')}>
                    <Search />
                </div>

                <div className={cx('header__right')}>
                    <Auth />
                </div>
            </header>

            <nav className={cx('menu')}>
                <ul>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to="/room">
                            Room
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to="/shop">
                            Shop
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to="/blog">
                            Blog
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to="/contact">
                            Contact
                        </Link>
                    </li>
                </ul>
            </nav>
        </>
    );
}
