import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';

@Component({
  selector: 'app-screenshots',
  templateUrl: './screenshots.component.html',
  styleUrls: ['./screenshots.component.css']
})
export class ScreenshotsComponent {
  projects: any[] = [];
  selectedProjectId: number | null = null;
  screenshots: any[] = [];

  constructor(private http: HttpClient) {
    this.fetchProjects();
  }

  fetchProjects() {
    this.http.get('http://127.0.0.1:8000/api/projects').subscribe((res: any) => {
      this.projects = res;
    });
  }

  handlePhotoInput(event: any) {
    const file = event.target.files[0];
    // Do something with the selected file, such as uploading it or processing it
  }

  onProjectSelect(event: any) {
    const projectId = event.target.value;
    this.selectedProjectId = projectId;
    this.fetchScreenshotsForProject(projectId);
  }

  fetchScreenshotsForProject(projectId: number) {
    if (projectId) {
      this.http.get(`http://127.0.0.1:8000/api/screenshots/project/${projectId}`).subscribe((res: any) => {
        this.screenshots = res;
      });
    }
  }

  addScreenshot() {
    const projectId = this.selectedProjectId;
    if (projectId) {
      const formData = new FormData();
      const fileInput = document.getElementById('photo') as HTMLInputElement;
      const file = fileInput?.files?.[0];

      if (file) {
        formData.append('screenshot', file);
        formData.append('project_id', projectId.toString());
        const formDataObject: any = {};
        formData.forEach((value, key) => {
          formDataObject[key] = value;
        });
        console.log('formData:', formDataObject);
        this.http.post('http://127.0.0.1:8000/api/screenshots/upload', formData).subscribe((res: any) => {
          // Handle the response, maybe refresh the screenshots list
          this.fetchScreenshotsForProject(projectId);
        }, (error) => {
          // Handle error
          console.error('Error uploading screenshot:', error);
        });
      }
    }
  }

  deleteScreenshot(id: any) {

    this.http.delete('http://127.0.0.1:8000/api/screenshots/' + id).subscribe((res => {
      const projectId = this.selectedProjectId;
      if (projectId) {
        this.fetchScreenshotsForProject(projectId);
      }
    }));

  }
}
