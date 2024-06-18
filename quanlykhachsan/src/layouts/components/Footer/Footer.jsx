import classNames from 'classnames/bind';
import styles from './Footer.module.scss';
import { Link } from 'react-router-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faLocation, faPhone, faVoicemail, faClock } from '@fortawesome/free-solid-svg-icons';
import {
    faSquareFacebook,
    faSquareInstagram,
    faSquarePinterest,
    faSquareTwitter,
    faSquareYoutube
} from '@fortawesome/free-brands-svg-icons';

const cx = classNames.bind(styles);

export default function Footer() {
    return (
        <>
            <div className={cx('container')}>
                <footer className={cx('footer')}>
                    <div className={cx('footer__grid')}>
                        <div className={cx('footer__grid-grow')}>
                            <div className={cx('footer__grid-column-2-4')}>
                                <h3 className={cx('footer__heading')}>EQHotel</h3>
                                <ul className={cx('footer__list')}>
                                    <li className={cx('footer__item')}>Awesome grocery store website template</li>
                                    <li className={cx('footer__item')}>
                                        <span>
                                            <FontAwesomeIcon
                                                icon={faLocation}
                                                size="lg"
                                                className={cx('footer__item-iconleft')}
                                            />
                                        </span>
                                        <strong>Address: </strong>
                                        <span className={cx('footer__item-detail')}>
                                            5171 W Campbell Ave undefined Kent, Utah 53127 United States
                                        </span>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <span>
                                            <FontAwesomeIcon
                                                icon={faPhone}
                                                size="lg"
                                                className={cx('footer__item-iconleft')}
                                            />
                                        </span>
                                        <strong>Call Us: </strong>
                                        <span className={cx('footer__item-detail')}>(+84) - 035-333-222</span>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <span>
                                            <FontAwesomeIcon
                                                icon={faVoicemail}
                                                size="lg"
                                                className={cx('footer__item-iconleft')}
                                            />
                                        </span>
                                        <strong>Email: </strong>
                                        <span className={cx('footer__item-detail')}>sale@eqhotel.com</span>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <span>
                                            <FontAwesomeIcon
                                                icon={faClock}
                                                size="lg"
                                                className={cx('footer__item-iconleft')}
                                            />
                                        </span>
                                        <strong>Working Hours: </strong>
                                        <span className={cx('footer__item-detail')}>10:00 - 18:00, Mon - Sat</span>
                                    </li>
                                </ul>
                            </div>
                            <div className={cx('footer__grid-column-2-4')}>
                                <h3 className={cx('footer__heading')}>Company</h3>
                                <ul className={cx('footer__list')}>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            About us
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Career
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Contact us
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                            <div className={cx('footer__grid-column-2-4')}>
                                <h3 className={cx('footer__heading')}>Categories</h3>
                                <ul className={cx('footer__list')}>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Milks and Dairies
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Clothing & beauty
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Pet Toy
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Baking meterial
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Fresh Fruit
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Wines & Drinks
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                            <div className={cx('footer__grid-column-2-4')}>
                                <h3 className={cx('footer__heading')}>Information</h3>
                                <ul className={cx('footer__list')}>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Contact Us
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            About Us
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Cookie Policy
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Terms & Conditions
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Returns & Exchanges
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Shipping & Delivery
                                        </Link>
                                    </li>
                                    <li className={cx('footer__item')}>
                                        <Link className={cx('footer__item-link')} to="/">
                                            Privacy Policy
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div className={cx('footer__bottom')}>
                        <ul className={cx('footer__list')}>
                            <li className={cx('footer__contact')}>
                                <p>Copyright © 2024 EQHotel all rights reserved. Powered by Botble.</p>
                            </li>
                            <li className={cx('footer__contact')}>
                                <h4>
                                    <FontAwesomeIcon icon={faPhone} size="2x" />
                                </h4>
                                <span>1900 - 888</span> <br />
                                <p>24/7 Support Center</p>
                            </li>
                            <li className={cx('footer__contact')}>
                                <h3>
                                    Follow US
                                    <span>
                                        <FontAwesomeIcon icon={faSquareFacebook} size="lg" />
                                    </span>
                                    <span>
                                        <FontAwesomeIcon icon={faSquareTwitter} size="lg" />
                                    </span>
                                    <span>
                                        <FontAwesomeIcon icon={faSquareInstagram} size="lg" />
                                    </span>
                                    <span>
                                        <FontAwesomeIcon icon={faSquarePinterest} size="lg" />
                                    </span>
                                    <span>
                                        <FontAwesomeIcon icon={faSquareYoutube} size="lg" />
                                    </span>
                                </h3>
                                <br />
                                <p>Up to 15% discount on your first subscribe</p>
                            </li>
                        </ul>
                    </div>
                </footer>
            </div>
        </>
    );
}
