import { useState } from 'react';
import classNames from 'classnames/bind';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch } from '@fortawesome/free-solid-svg-icons';

import styles from './Search.module.scss';
const cx = classNames.bind(styles);

import { /*useDebounce,*/ useMobile } from '~/hooks';

export default function Search() {
    const [showInput, setShowInput] = useState(false);

    const isMobile = useMobile(); // Use the hook
    /*
         To avoid typing text into the search input, sending too many requests to the server will use hooks 
         useDebounce so that when the user stops typing, the request will be sent
         -----
         để phòng tránh việc gõ text vào inp tìm kiếm nhưng gửi quá nhiều request lên server sẽ dùng hook 
         useDebounce để khi người dùng dừng gõ sẽ gửi request
    */
   
    // const debouncedValue = useDebounce(searchValue, 500);

    const handleIconClick = () => {
        setShowInput(!showInput);
    };

    return (
        <div className={cx('searchbar')}>
            <form>
                <input
                    type="text"
                    placeholder="Search..."
                    style={{ display: showInput || !isMobile ? 'block' : 'none' }}
                />
                <span className={cx('search-icon')} onClick={handleIconClick}>
                    <FontAwesomeIcon icon={faSearch} />
                </span>
            </form>
        </div>
    );
}
