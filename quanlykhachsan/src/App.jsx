import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './layouts/components/Header';

import { publicRoutes, privateRoutes } from './routes/routes';
import PrivateRoute from './components/PrivateRoute';

export default function App() {
    return (
        <>
            <Router>
                <Header />
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
            </Router>
        </>
    );
}
