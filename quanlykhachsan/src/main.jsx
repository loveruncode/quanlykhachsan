import ReactDOM from 'react-dom/client';
import App from './App.jsx';
import { Provider } from 'react-redux';
import { PersistGate } from 'redux-persist/integration/react';
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import { persistor, store } from './redux/store.js';
import GlobalStyles from './components/GlobalStyles';

ReactDOM.createRoot(document.getElementById('root')).render(
    <Provider store={store}>
        <PersistGate persistor={persistor} loading={null}>
            <GlobalStyles>
                <App />
                <ToastContainer />
            </GlobalStyles>
        </PersistGate>
    </Provider>
);
