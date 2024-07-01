import { useState } from 'react';
import classNames from 'classnames/bind';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch } from '@fortawesome/free-solid-svg-icons';

import styles from './Search.module.scss';
const cx = classNames.bind(styles);

import { /*useDebounce,*/ useMobile } from '~/hooks';
import Button from '~/components/Button';
import OffCanvas from '~/components/OffCanvas';

export default function Search() {
    const [inp, setInp] = useState('');
    const [showInput, setShowInput] = useState(false);
    const [showOffcanvas, setShowOffcanvas] = useState(false);

    const isMobile = useMobile(); // Use the hook

    const handleShow = () => setShowOffcanvas(true);
    const handleClose = () => setShowOffcanvas(false);

    /*
         To avoid typing text into the search input, sending too many requests to the server will use hooks 
         useDebounce so that when the user stops typing, the request will be sent
         -----
         để phòng tránh việc gõ text vào inp tìm kiếm nhưng gửi quá nhiều request lên server sẽ dùng hook 
         useDebounce để khi người dùng dừng gõ sẽ gửi request
    */

    // const debouncedValue = useDebounce(searchValue, 500);

    const handleSearch = (e) => {
        setInp(e.target.value);
    };

    const handleIconClick = (e) => {
        e.preventDefault();
        setShowInput(!showInput);
    };

    return (
        <>
            {isMobile ? (
                <div>
                    <Button onClick={handleShow}>
                        <FontAwesomeIcon icon={faSearch} />
                    </Button>
                    <OffCanvas
                        isOpen={showOffcanvas}
                        background={true}
                        title="Search"
                        closeOffCanvas={handleClose}
                        page
                    >
                        <div className={cx('searchbar')}>
                            <form>
                                <input type="text" value={inp} onChange={handleSearch} placeholder="Search..." />
                                <span className={cx('search-icon')} onClick={handleIconClick}>
                                    <FontAwesomeIcon icon={faSearch} />
                                </span>
                            </form>
                        </div>
                    </OffCanvas>
                </div>
            ) : (
                <div className={cx('searchbar')}>
                    <form>
                        <input type="text" value={inp} onChange={handleSearch} placeholder="Search..." />
                        <span className={cx('search-icon')} onClick={handleIconClick}>
                            <FontAwesomeIcon icon={faSearch} />
                        </span>
                    </form>
                </div>
            )}
        </>
    );
}
