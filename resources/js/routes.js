import Owners from './components/Owners.vue';
import Owner from './components/Owner.vue';
import Addresses from './components/Addresses.vue';
import Address from './components/Address.vue';
import Cars from './components/Cars.vue';
import Car from './components/Car.vue';

export const routes = [
    {
        name: 'owners',
        path: '/owners',
        component: Owners
    },
    {
        name: 'owner',
        path: '/owner/:id/edit',
        component: Owner
    },
    {
        name: 'addresses',
        path: '/addresses',
        component: Addresses
    },
    {
        name: 'address',
        path: '/address/:id/edit',
        component: Address
    },
    {
        name: 'cars',
        path: '/cars',
        component: Cars
    },
    {
        name: 'car',
        path: '/car/:id/edit',
        component: Car
    },
];
