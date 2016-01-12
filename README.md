#VRCore
Work in progress!


##Architecture
- `vr-core.php`: Main plugin file that includes `vrc.php`
- `vrc.php`: Main initializer for everything

###Design Pattern
Let's assume we are building a functionality called `feature`
- Folder: `feature` 
- File: `feature-init.php` includes everything classes and actions/filters
- File: `class-feature.php` main class that interacts with other small classes
- File: `cpt-feature.php` class for the Custom Post Type
- File: `ct-feature-taxanomy.php` class for the custom taxanomy
- File: `feature-custom` a custom class for a sub-feature
- File: `class-feature-meta-boxes` class for related meta boxes

