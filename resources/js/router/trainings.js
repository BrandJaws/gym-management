import Trainings from '../views/trainings/trainings.vue';

export default{
    routes: [
         {
            path: '/gym/training/edit/id',
            name: 'trainings',
            component: Trainings,
        },
    ]
};
