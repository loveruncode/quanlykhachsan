import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { useState, useEffect } from 'react';
import Header from './components/Header';
import { publicRoutes, privateRoutes } from './routes/routes';
import SignInModal from './components/Auth/SignInModal';

export default function App() {
    const token = localStorage.getItem('token');
    const [showModal, setShowModal] = useState(false); // State để kiểm soát việc hiển thị modal đăng nhập

    const currentUser = token ? true : false;
    const [loggedIn, setLoggedIn] = useState(currentUser);

    useEffect(() => {
        if (!currentUser) {
            setShowModal(true);
        } else {
            setShowModal(false); // Nếu đã có token, ẩn modal
            setLoggedIn(true);
        }
    }, [currentUser]);

    const handleLoginSuccess = () => {
        setLoggedIn(true);
    };
    console.log(currentUser);

    return (
        <>
            <Router>
                <Header />
                <Routes>
                    {/* Các route public */}
                    {publicRoutes.map((route, index) => (
                        <Route key={index} path={route.path} element={<route.component />} />
                    ))}
                    {/* Các route private */}
                    {privateRoutes.map((route, index) => (
                        <Route
                            key={index}
                            path={route.path}
                            element={
                                loggedIn ? (
                                    <route.component />
                                ) : (
                                    <SignInModal isOpen={showModal} closeModal={handleLoginSuccess} />
                                )
                            }
                        />
                    ))}
                </Routes>
            </Router>
        </>
    );
}
