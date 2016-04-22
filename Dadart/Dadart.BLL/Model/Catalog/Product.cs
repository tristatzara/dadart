using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Model.Catalog
{
    public class Product
    {
        public Guid ProductId { get; set; }
        public string Name { get; set; }
        public string ShortDesc { get; set; }
        public string Thumb { get; set; }
        public Guid ArtistId { get; set; }
        
    }
}
