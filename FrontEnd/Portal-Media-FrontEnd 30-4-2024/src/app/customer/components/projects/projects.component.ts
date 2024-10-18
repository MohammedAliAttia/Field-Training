import { Component, ElementRef } from '@angular/core';
import { SharedService } from '../../services/shared/shared.service';
import { ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.css']
})
export class ProjectsComponent {
  baseurl = "http://127.0.0.1:8000/api/";

  projectname: any;
  projects: any = {};
  constructor(private shared: SharedService, private elementRef: ElementRef, private route: ActivatedRoute, private http: HttpClient) {
    this.scrollDown();
    route.params.subscribe(result => {
      
      this.projectname = result["name"];
      this.shared.getProjectByDepartmentID(result["id"]).subscribe(result => {
        console.log(result);
     
        this.projects = result;
      });
    })
   
  }


  ngOnInit() {
    // Scroll down to the component element
    this.scrollDown();
  }


  scrollDown() {
    // Scroll down to the native element of the component
    this.elementRef.nativeElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
}
