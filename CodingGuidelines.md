# Coding Guidelines Rentify

## 1. Naming Conventions
- variable : Used camelCasing for variables 
- class and controllers : Used PascalCasing for class and controller file names
- functions : Used Camel Casing for function names
- views: Used camelCasing for naming

## 2. Repository Structure utilization
- Adopted a standardized repository structure to ensure consistency and maintainability across the project
### Interface and Repository Creation
- Developed interfaces and corresponding repository classes to define clear contracts 
### Repository Implementation
- Implemented repository classes to encapsulate data access logic, adhering to the defined interfaces for consistency and testability.

## 3. Controllers:
- Handle HTTP requests and responses.
- Delegate business logic to models or services.

## 4. Models:
- Used models to handle data retrieval, manipulation, and validation in the project.

## 5. Views:
- Handle presentation.
- Free of business Logic

## 6. Directory Structure
- Followed the codeigniter directory structure
- Stored the APIs related interfaces and repositories in APIS package
- Stored the css and images inside the assets folder i.e public/assets/css and public/assets/images folder respectively.
## 7. Dependency Injection 
- Dependency injection is not supported by code igniter 
- Used the App\Config\Services class for managing the dependency in the project
- Creates a new instance of a class when a function is called from any constructor