import classNames from 'classnames/bind';
import { Link } from 'react-router-dom';

import Search from './components/Search';
import styles from './Header.module.scss';
import Auth from './Auth';
import Image from '~/components/image';
import images from '~/assets/images';
import Cart from './components/Cart';
import Notify from './components/Notify';

const cx = classNames.bind(styles);

export default function Header() {
    // test login user
    const currentUser = true;

    return (
        <>
            <header className={cx('header')}>
                <div className={cx('header__left')}>
                    <Link className={cx('header__left-logo')} to="/">
                        <img src={images.logo} alt="logo" />
                    </Link>
                </div>

                <div className={cx('header__center')}>
                    <Search />
                </div>

                <div className={cx('header__right')}>
                    {/* if currentUser === true to show cart notify avt user else show auth sign up sign in */}
                    {currentUser ? (
                        <ul className={cx('header__rigth-currentuser')}>
                            <li className={cx('header__rigth-notify')}>
                                <Notify />
                            </li>
                            <li className={cx('header__rigth-cart')}>
                                <Cart />
                            </li>
                            <li>
                                <Image className={cx('user-avatar')} src="asdahjsbdjas" alt="Nguyen Van A" />
                            </li>
                        </ul>
                    ) : (
                        <Auth />
                    )}
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
