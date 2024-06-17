import { useSelector } from 'react-redux';
import { Outlet, Navigate } from 'react-router-dom';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

export default function PrivateRoute() {
    const { currentUser } = useSelector((state) => state.user);

    if (!currentUser) {
        // Hiển thị toast warning khi chưa đăng nhập
        toast.warning('Bạn cần đăng nhập mới vào được');
        // Chuyển hướng người dùng đến trang /room nếu chưa đăng nhập
        return <Navigate to="/room" />;
    }

    return <Outlet />;
}
