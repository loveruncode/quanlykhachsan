import classNames from 'classnames/bind';
import styles from './Footer.module.scss';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faLocation, faPhone, faVoicemail, faClock,} from '@fortawesome/free-solid-svg-icons';
import { faAppStore, faGooglePay, faSquareFacebook, faSquareInstagram, faSquarePinterest, faSquareTwitter, faSquareYoutube } from '@fortawesome/free-brands-svg-icons';


const cx = classNames.bind(styles);

export default function Footer() {
    return (
        <>
            <footer className={cx('footer')}>
                {/* <div className={cx('footer__left')}>
                    <Link className={cx('footer__left-logo')} to="/">
                        <img src={logo} alt="logo" />
                    </Link>
                </div> */}
                <div className={cx('footer__grid')}>
                    <div className={cx('footer__grid-grow')}>
                        <div className={cx('footer__grid-column-2-4')}>
                            <h3 className={cx('footer__heading')}>Nest</h3>
                            <ul className={cx('footer__list')}>
                                <li className={cx('footer__item')}>
                                    <p  href='' className='footer__item-link'>Awesome grocery store website template</p>
                                </li>
                                <li className={cx('footer__item')}>
                                <span><FontAwesomeIcon icon={faLocation} size='lg' /></span>
                                    <p href='' className='footer__item-link'>Address: 5171 W Campbell Ave undefined Kent, Utah 53127 United States</p>
                                </li>
                                <li className={cx('footer__item')}>
                                <span><FontAwesomeIcon icon={faPhone} size='lg' /></span>
                                    <p href='' className='footer__item-link'> Call Us: (+91) - 540-025-124553</p>
                                </li>
                                <li className={cx('footer__item')}>
                                <span><FontAwesomeIcon icon={faVoicemail} size='lg' /></span>
                                    <p href='' className='footer__item-link'> Email: sale@Nest.com</p>
                                </li>
                                <li className={cx('footer__item')}>
                                <span><FontAwesomeIcon icon={faClock} size='lg' /></span>
                                    <p href='' className='footer__item-link'> Working Hours: 10:00 - 18:00, Mon - Sat</p>
                                </li>
                            </ul>
                        </div>
                        <div className={cx('footer__grid-column-2-4')}>
                            <h3 className={cx('footer__heading')}>Company</h3>
                            <ul className={cx('footer__list')}>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>About us</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Career</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Contact us</a>
                                </li>
                            </ul>
                        </div>
                        <div className={cx('footer__grid-column-2-4')}>
                            <h3 className={cx('footer__heading')}>Categories</h3>
                            <ul className={cx('footer__list')}>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Milks and Dairies</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Clothing & beauty</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Pet Toy</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Baking meterial</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Fresh Fruit</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Wines & Drinks</a>
                                </li>
                            </ul>
                        </div>
                        <div className={cx('footer__grid-column-2-4')}>
                            <h3 className={cx('footer__heading')}>Information</h3>
                            <ul className={cx('footer__list')}>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Contact Us</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>About Us</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Cookie Policy</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Terms & Conditions</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Returns & Exchanges</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Shipping & Delivery</a>
                                </li>
                                <li className={cx('footer__item')}>
                                    <a href='' className='footer__item-link'>Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                        <div className={cx('footer__grid-column-2-4')}>
                            <h3 className={cx('footer__heading')}>Install App</h3>
                            <ul className={cx('footer__list')}>
                                <li className={cx('footer__item')}>
                                    <p href='' className='footer__item-link'>From App Store or Google Play <br />
                                    <span><FontAwesomeIcon icon={faAppStore} size='2x' /></span>
                                    <span><FontAwesomeIcon icon={faGooglePay} size='2x' /></span>
                                    </p>
                                </li>
                                <li className={cx('footer__item')}>
                                    <p href='' className='footer__item-link'>Secured Payment Gateways</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div className={cx('footer__bottom')}>
                    <ul className={cx('footer__list')}>
                        <li className={cx('footer__contact')}>
                            <p>Copyright © 2024 Nest all rights reserved. Powered by Botble.</p>
                        </li>
                        <li className={cx('footer__contact')}>
                            <h4><FontAwesomeIcon icon={faPhone} size='2x' /></h4>
                            <span>1900 - 888</span> <br />
                            <p>24/7 Support Center</p>
                        </li>
                        <li className={cx('footer__contact')}>
                            <h3> Follow US
                            <span><FontAwesomeIcon icon={faSquareFacebook} size='lg' /></span>
                            <span><FontAwesomeIcon icon={faSquareTwitter} size='lg' /></span>
                            <span><FontAwesomeIcon icon={faSquareInstagram} size='lg' /></span>
                            <span><FontAwesomeIcon icon={faSquarePinterest} size='lg' /></span>
                            <span><FontAwesomeIcon icon={faSquareYoutube} size='lg' /></span>
                            </h3> <br />
                            <p>Up to 15% discount on your first subscribe</p>
                        </li>
                    </ul>
                </div>
            </footer>
        </>
    );
}
