import PropTypes from 'prop-types';
import { useState, forwardRef } from 'react';
import classNames from 'classnames';
import images from '~/assets/images';
import styles from './Image.module.scss';

const Image = forwardRef(({ src, alt, className, fallback: customFallback = images.profileImage, ...props }, ref) => {
    const [fallbackSrc, setFallbackSrc] = useState(customFallback);

    const handleError = () => {
        setFallbackSrc(customFallback);
    };

    const handleNullSrc = () => {
        setFallbackSrc(customFallback);
    };

    return (
        <img
            className={classNames(styles.wrapper, className)}
            ref={ref}
            src={src || fallbackSrc}
            alt={alt}
            {...props}
            onError={handleError}
            onInvalid={handleNullSrc}
        />
    );
});

Image.displayName = 'Image';

Image.propTypes = {
    src: PropTypes.string,
    alt: PropTypes.string,
    className: PropTypes.string,
    fallback: PropTypes.string
};

export default Image;
