import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';

import { publicRoutes, privateRoutes } from './routes/routes';
import PrivateRoute from './components/PrivateRoute';
import MainLayout from './layouts/MainLayout';

//import route from './routes/routes';
//import Header from './components/Header/Header';

export default function App() {
    return (
        <>
            <Router>
                <MainLayout>
                    <Routes>
                        {/* Các route public */}
                        {publicRoutes.map((route, index) => (
                            <Route key={index} path={route.path} element={<route.component />} />
                        ))}
                        {/* check route ẩn nếu ko đăng nhập đá về room và cảnh báo */}
                        <Route element={<PrivateRoute />}>
                            {privateRoutes.map((route, index) => (
                                <Route key={index} path={route.path} element={<route.component />} />
                            ))}
                        </Route>
                    </Routes>
                </MainLayout>
            </Router>
        </>
    );
}
