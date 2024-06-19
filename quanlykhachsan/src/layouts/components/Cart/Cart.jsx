import { useState } from 'react';
import classNames from 'classnames/bind';
import { faCartShopping } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

import Button from '~/components/Button';
import styles from '~/layouts/components/Header/Header.module.scss';
import { useMobile } from '~/hooks';
import OffCanvas from '~/components/OffCanvas';

const cx = classNames.bind(styles);
export default function Cart() {
    const [showOffcanvas, setShowOffcanvas] = useState(false);

    const handleShow = () => setShowOffcanvas(true);
    const handleClose = () => setShowOffcanvas(false);

    const isMobile = useMobile();

    return (
        <>
            {isMobile ? (
                <>
                    <Button small className={cx('btn-Cart')} onClick={handleShow}>
                        <FontAwesomeIcon icon={faCartShopping} /> <span>Giỏ hàng</span>
                    </Button>
                    <OffCanvas
                        isOpen={showOffcanvas}
                        background={true}
                        title="Shopping Cart"
                        closeOffCanvas={handleClose}
                        page
                    >
                        <div>
                            <h2>Your Cart</h2>
                            <p>Here are the items in your cart.</p>
                        </div>
                    </OffCanvas>
                </>
            ) : (
                <>
                    <Button small className={cx('btn-Cart')} onClick={handleShow}>
                        <FontAwesomeIcon icon={faCartShopping} />
                    </Button>
                    <OffCanvas
                        isOpen={showOffcanvas}
                        background={true}
                        title="Shopping Cart"
                        closeOffCanvas={handleClose}
                        position="right"
                    >
                        <div>
                            <h2>Your Cart</h2>
                            <p>Here are the items in your cart.</p>
                        </div>
                    </OffCanvas>
                </>
            )}
        </>
    );
}
