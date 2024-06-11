import config from '~/config';
import { Home, Profile, Contact, Shop, Room, Blog, NotFound } from '~/pages';

const routes = [
    { path: config.routes.home, component: Home },
    {
        path: config.routes.profile,
        component: Profile,
        exact: true
    },
    { path: `${config.routes.profile}/:id`, component: Profile },
    { path: config.routes.shop, component: Shop },
    { path: config.routes.blog, component: Blog },
    { path: config.routes.contact, component: Contact },
    { path: config.routes.room, component: Room },
    { path: '*', component: NotFound }
];

export default routes;
