import config from '~/config';
import { Home, Profile, Contact, Shop, Room, Blog, NotFound, HistoryOders, Security } from '~/pages';
import RoomDetails from '~/pages/RoomDetails';

const publicRoutes = [
    { path: config.routes.home, component: Home },
    { path: config.routes.shop, component: Shop },
    { path: config.routes.blog, component: Blog },
    { path: config.routes.contact, component: Contact },
    { path: config.routes.room, component: Room },
    { path: config.routes.roomDetails, component: RoomDetails },
    { path: '*', component: NotFound }
];
const privateRoutes = [
    { path: config.routes.profile, component: Profile, exact: true },
    { path: config.routes.historyOrders, component: HistoryOders },
    { path: config.routes.security, component: Security }
];

export { publicRoutes, privateRoutes };
