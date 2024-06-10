import { useState } from 'react';
import { faCartShopping } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

import Button from '~/components/Button';
import styles from '~/components/Header/Header.module.scss';
import classNames from 'classnames';
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
            <div>
                <Button small className={cx('btn-Cart')} onClick={handleShow}>
                    <FontAwesomeIcon icon={faCartShopping} />
                </Button>
                {isMobile ? (
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
                ) : (
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
                )}
            </div>
        </>
    );
}
