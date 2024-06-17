import { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBell } from '@fortawesome/free-solid-svg-icons';
import classNames from 'classnames/bind';

import Modal from '~/components/Modal';
import Button from '~/components/Button';
import styles from '~/layouts/components/Header/Header.module.scss';

const cx = classNames.bind(styles);

export default function Notify() {
    const [showModal, setShowModal] = useState(false);

    const handleShow = () => setShowModal(true);
    const handleClose = () => setShowModal(false);
    return (
        <>
            <Button small className={cx('btn-Notify')} onClick={handleShow}>
                <FontAwesomeIcon icon={faBell} />
            </Button>
            <Modal isOpen={showModal} closeModal={handleClose} title="Notification" background={true}>
                Thông báo
            </Modal>
        </>
    );
}
