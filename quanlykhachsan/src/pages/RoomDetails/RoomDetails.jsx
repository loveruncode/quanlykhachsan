import classNames from 'classnames/bind';
import { useParams } from 'react-router-dom';

import styles from './RoomDetails.module.scss';
import MockApi from '../Room/room.json';

const cx = classNames.bind(styles);

export default function RoomDetails() {
    let { id } = useParams();
    const room = MockApi.find((item) => item.roomId === id);
    console.log(room);
    return (
        <div className={cx('roomDetailsContainer')}>
            <div className={cx('left')}>
                
            </div>
            <div className={cx('right')}></div>
        </div>
    );
}
