import { useEffect, useState } from 'react';

export default function useIsMobile() {
    const [isMobile, setIsMobile] = useState(false);

    useEffect(() => {
        const handleResize = () => {
            setIsMobile(window.innerWidth < 900);
        };

        // Initial check on mount
        handleResize();

        // Listen to window resize events
        window.addEventListener('resize', handleResize);

        // Cleanup
        return () => {
            window.removeEventListener('resize', handleResize);
        };
    }, []);

    return isMobile;
}
