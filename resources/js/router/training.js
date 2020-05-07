import Training from '../views/training/training.vue';

export default{
    routes: [
         {
            path: '/gym/training/edit/{id}',
            name: 'training',
            component: Training,
        },
    ]
};
