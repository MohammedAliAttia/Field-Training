import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { HomeComponent } from './components/home/home.component';
import { DepartmentComponent } from './components/department/department.component';
import { ProjectsComponent } from './components/projects/projects.component';
import { ScreenshotsComponent } from './components/screenshots/screenshots.component';
 

const routes: Routes = [
  {path:'',component:LoginComponent},
  {
    path: 'home',
    component: HomeComponent,
    children: [
      { path: 'department', component: DepartmentComponent },
      { path: 'projects', component: ProjectsComponent },
      { path: 'screenshots', component: ScreenshotsComponent },
      // Add more routes for other admin panel components
    ]
  }
];


@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminPanelRoutingModule { }
