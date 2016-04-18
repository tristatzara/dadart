using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClassLibrary1.Model.Catalog
{
    class Product
    {
        public Guid ProductId { get; set; }
        public string Name { get; set; }
        public string ShortDesc { get; set; }
        public string THumb { get; set; }
        public Guid ArtistId { get; set; }
        
    }
}
