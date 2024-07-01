import classNames from 'classnames/bind';
import styles from './Room.module.scss';
import Card from '~/components/Card';
import mockroom from './room.json';
import { Link } from 'react-router-dom';

const cx = classNames.bind(styles);

export default function Room() {
    return (
        <div className={cx('cardContainer')}>
            {mockroom.map((item, index) => {
                return (
                    <Card key={index} className={cx('card')}>
                        <Link to={`room-details/${item.roomId}`}>
                            <div className={cx('cardHeader')}>
                                <img className={cx('image')} src={item.imageUrl} alt={item.title} />
                                <div className={cx('cardHeaderTitle')}>
                                    <h4 className={cx('title')}>{item.title}</h4>
                                    <p className={cx('rating')}>{item.rating}</p>
                                </div>
                            </div>
                            <div className={cx('cardBody')}>
                                <p className={cx('desc')}>{item.address}</p>
                                <p className={cx('price')}>
                                    <span>{item.pricePerDate} triệu</span>
                                </p>
                            </div>
                        </Link>
                    </Card>
                );
            })}
        </div>
    );
}
