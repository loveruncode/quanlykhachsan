import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';

import route from './routes/routes';
import Header from './components/Header/Header';
import Footer from './components/Footer/Footer';

export default function App() {
    return (
        <>
            <Router>
                <Header />
                <Routes>
                    {route.map((route, index) => {
                        const Page = route.component;
                        return <Route key={index} path={route.path} element={<Page />} />;
                    })}
                </Routes>
                <Footer />
                
            </Router>
        </>
    );
}
