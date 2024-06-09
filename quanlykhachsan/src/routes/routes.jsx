import { Home, Profile, Contact, Shop, Room, Blog } from '~/pages';

const route = [
    { path: '/', component: Home },
    { path: '/profile', component: Profile },
    { path: '/shop', component: Shop },
    { path: '/blog', component: Blog },
    { path: '/contact', component: Contact },
    { path: '/room', component: Room }
];

export default route;
