import classNames from 'classnames/bind';
import { Link, useParams } from 'react-router-dom';

import config from '~/config';
import Search from './components/Search';
import Notify from './components/Notify';
import Image from '~/components/Image';
import Cart from './components/Cart';
import Auth from './Auth';
import images from '~/assets/images';
import styles from './Header.module.scss';

const cx = classNames.bind(styles);

export default function Header() {
    let { id = 1 } = useParams();
    // test login user
    const currentUser = true;

    return (
        <>
            <header className={cx('header')}>
                <div className={cx('header__left')}>
                    <Link className={cx('header__left-logo')} to={config.routes.home}>
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
                                <Link to={`${config.routes.profile}/${id}`}>
                                    <Image className={cx('user-avatar')} src="asdahjsbdjas" alt="Nguyen Van A" />
                                </Link>
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
                        <Link className={cx('menu__item-link')} to={config.routes.room}>
                            Room
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to={config.routes.shop}>
                            Shop
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to={config.routes.blog}>
                            Blog
                        </Link>
                    </li>
                    <li className={cx('menu__item')}>
                        <Link className={cx('menu__item-link')} to={config.routes.contact}>
                            Contact
                        </Link>
                    </li>
                </ul>
            </nav>
        </>
    );
}
