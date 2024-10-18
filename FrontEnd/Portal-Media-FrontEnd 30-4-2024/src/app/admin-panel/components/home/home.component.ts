import { Component } from '@angular/core';
import { SidebarService } from '../../services/sidebar/sidebar.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
  sidebarWidth: number = 250; // Initial width of the sidebar

  constructor(private sidebarService: SidebarService) { }

  ngOnInit() {
    this.sidebarService.isSidebarOpen$.subscribe(isOpen => {
      if (isOpen) {
        this.sidebarWidth = 300; // Set the width when sidebar is open
      } else {
        this.sidebarWidth = 100; // Set the width when sidebar is closed
      }
    });
  }
}
